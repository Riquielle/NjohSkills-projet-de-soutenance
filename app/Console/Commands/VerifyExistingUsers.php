<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class VerifyExistingUsers extends Command
{
    protected $signature = 'users:verify-existing';

    protected $description = 'Marque comme vérifiés les utilisateurs créés avant la mise en place de la vérification e-mail';

    public function handle()
    {
        $users = User::whereNull('email_verified_at')
            ->where('created_at', '<', '2026-09-19 00:00:00')
            ->get();

        if ($users->isEmpty()) {
            $this->info('Aucun ancien utilisateur à vérifier.');
            return Command::SUCCESS;
        }

        foreach ($users as $user) {
            $user->email_verified_at = now();
            $user->save();

            $this->info("Utilisateur vérifié : {$user->email}");
        }

        $this->info(
            $users->count() . ' ancien(s) utilisateur(s) ont été marqués comme vérifiés.'
        );

        return Command::SUCCESS;
    }
}