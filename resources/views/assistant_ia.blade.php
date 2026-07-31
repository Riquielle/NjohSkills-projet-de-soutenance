@extends('Accueil.layouts.appp2')


@section('content')


<div class="container py-5">


<h2 class="fw-bold mb-4">

🤖 Assistant IA

</h2>



<div class="card shadow border-0">


<div class="card-body">


<div id="chat"
style="height:400px;overflow-y:auto;"
class="border rounded p-3 mb-3">


<div class="alert alert-info">

Bonjour 👋  
Je suis votre assistant IA.
Posez-moi vos questions sur vos formations.

</div>


</div>




<div class="input-group">


<input type="text"
id="message"
class="form-control"
placeholder="Posez votre question...">


<button class="btn btn-success"
onclick="envoyerMessage()">

Envoyer

</button>


</div>


</div>


</div>


</div>



<script>


function envoyerMessage(){


let message =
document.getElementById('message').value;



if(message=="")
return;



let chat =
document.getElementById('chat');



chat.innerHTML += `

<div class="alert alert-secondary">

<b>Vous :</b>

${message}

</div>

`;




fetch("{{ route('assistant_message') }}",
{

method:"POST",

headers:{

"Content-Type":"application/json",

"X-CSRF-TOKEN":
"{{ csrf_token() }}"

},


body:JSON.stringify({

message:message

})


})

.then(response=>response.json())

.then(data=>{


chat.innerHTML += `

<div class="alert alert-success">

<b>Assistant IA :</b>

${data.reponse}

</div>

`;



document.getElementById('message').value="";


chat.scrollTop =
chat.scrollHeight;


});


}


</script>


@endsection