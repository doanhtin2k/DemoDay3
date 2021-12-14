<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
class ConvertEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:convert-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert email in table admins';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admins = Admin::where('email', 'like', '%@gmail.com%')->get();
        $admins->each(function ($admin) {
            $this->convertEmail($admin);
        });
    }
    public function convertEmail($admin)
    {
        try {
            $oldEmail = $admin->email;
            $newEmail = str_replace('@gmail.com', '@rabiloo.com', $admin->email);
            $admin->email = $newEmail;
            $admin->save();
            $this->info("convert email from {$oldEmail} to {$newEmail} Success!");
        } catch (Exception $e) {
            $this->error("convert email {$oldEmail} Fail!");
            $this->error('--- ' . $e->getMessage());
        }
    }
    // php artisan admin:convert-email
}
