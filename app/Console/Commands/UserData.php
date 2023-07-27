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
            if ($this->confirm('Do you want to continue?') === false) {
                $this->error('The command is complete.');
            }
        }
        $option = $this->choice('make a choice:', ['read', 'write']);
        if ($option === 'read') {
            $this->readFile();
        } elseif ($option === 'write') {
            $this->writeFile();
        }
    }

    private function readFile(): void
    {
        $file = 'example.txt';
        if (file_exists($file)) {
            $content = file_get_contents($file);
            $this->info("The contents of the file: \n {$content}");
        } else {
            $this->error('Content does not exist.');
        }
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
            $this->error('Error writing data to file');
        } else {
            $this->info('Data recording is successful!');
        }
    }
}
