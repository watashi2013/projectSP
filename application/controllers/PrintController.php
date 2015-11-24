<?php

class interface IPrint
{
	public function Print();
}

class Printer : IPrint
{
	public function Print()
	{
		//TODO
		//print to Printer
		echo "print to prrinter";
	}
}

class Files : IPrint
{
	public function Print()
	{
		//TODO
		//print to file
		echo "print to files";
	}
}

class PrintManager
{
	public function PrintProcess(IPrint iPrint)
	{
		iPrint.Print();
	}
	/*
	public function PrintProcess(Files files)
	{
		files.Print();
	}
	*/
}

class PrintController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->database();
		$this->load->library('session');
	}
	
	public function PrintDetailProduct()//for deleting the user
	{
		IPrint mprint = new Files();
		
		printManager.PrintProcess(mprint);
	}
	
}

?>