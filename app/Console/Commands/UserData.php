<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class UserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:user-data {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()


    {
        $name = $this->argument('name');
        $this->info($name);
        $age = $this->ask('How old are you?');

        if ($age < 18) {
            $this->ifConfirm();
        }
        $option = $this->choice('make a choice:', ['read', 'write']);
        if ($this->ifRead($option)) {
            $this->readFile();
            return;
        }
        $this->writeFile();
    }

    private function ifConfirm(): void
    {
        if ($this->confirm('Do you want to continue?') === false) {
            $this->error('The command is complete.');
        }
    }

    private function ifRead($option): bool
    {
        if ($option === 'read') {
            return true;
        }
        return false;
    }


    private function readFile(): void
    {
        $file = 'example.txt';
        if (file_exists($file) === false) {
            $this->error('Content does not exist.');
            return;
        }
        $content = file_get_contents($file);
        $this->info("The contents of the file: \n {$content}");
    }

    private function writeFile(): void
    {
        $sex = $this->ask('What is your gender?');
        $city = $this->ask('What city are you from?');
        $phone = $this->ask('What is your phone number?');

        $data = [
            'sex' => $sex,
            'city' => $city,
            'phone' => $phone,
        ];
        $file = 'example.txt';
        $result = file_put_contents($file, json_encode($data));

        if ($result === false) {
            $this->error('Error writing data to file!');
            return;
        }
        $this->info('Data recording is successful!');
    }
}
