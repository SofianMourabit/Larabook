<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class RegisterUserCommand extends Command implements SelfHandling {


    public $username;
    public $email;
    public $password;
    protected $repository;

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(UserRepository $repository, $username, $email, $password)
	{
        $this->username = $username;
		$this->email = $email;
        $this->password = $password;
        $this->repository = $repository;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle($command)
	{

        $user = User::register(
           $command->username, $command->email, $command->password
        );

        $this->repository->save($user);

        return $user;
	}

}
