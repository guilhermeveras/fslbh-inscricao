<?php

/**
 * FileReader.
 *
 * @desc         Reads and outputs a pdf file.
 * @author       Joao Mariano 
 * @version      1.0
 */

class FileReader
{
	/*
	 * The file name
	 */
	private $filename;
	
	/*
	 * Constructor of the class, it gets the file name
	 */
	public function __construct($filename)
	{
		$this->setFileName($filename);		
	}
	
	/*
	 * Defines the file name
	 */
	public function setFileName($f)
	{
		$this->filename = $f;	
	}
	
	/*
	 * Returns the name of the file
	 */
	public function getFileName()
	{
		return $this->filename;	
	}
	
	/*
	 * Checks whether the file exists
	 */
	public function fileExists()
	{
		return file_exists($this->getFileName());
	}
	
	/*
	 * Returns the size of the file
	 */
	public function getFileSize()
	{
		return filesize($this->getFileName());
	}
	
	/*
	 * Adjusts the apropriate header to output the file
	 */
	public function setHeaders()
	{
		if ($this->fileExists()) {
			  header('Content-Description: File Transfer');
			  header('Content-Type: application/pdf');
			  header('Content-Disposition: attachment; filename=trabalho.pdf');
			  header('Content-Transfer-Encoding: binary');
			  header('Expires: 0');
			  header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			  header('Pragma: public');
			  header('Content-Length: ' . $this->getFileSize());
			  
			  return true;
		} else {
			return false;
		}
		
	}
	
	/*
	 * Clean and flushes the output buffer 
	 */
	public function ProcessOutputBuffer()
	{
		ob_clean();
		flush();
	}

	/*
	 * If the file is found outputs its content
	 */
	public function getFile()
	{
		if ($this->setHeaders())
		{
			$this->ProcessOutputBuffer();
			
			readfile($this->getFileName());	
			
			return true;
		} else {
			return false;
		}
	}
}

?>