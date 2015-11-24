<?php 
public interface MemberController
{
	public function Register();
	public function Login();
	public function Logout();
	public function GetUserState();
	public function DeleteUser();
	
}

public interface IRegister
{
	public function Register();
}

public interface ILogin
{
	public function Login();
}

public interface ILogout
{
	public function Logout();
}

public interface IGetUserState()
{
	public function GetUserState();
}

public interface IDeleteUser
{
	public function DeleteUser();
}

?>