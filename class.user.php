<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	public $error="";
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	public function errorGetter(){
		return $this->error;
		
	}
	public function errorSetter($data){
		$this->error= $data;
		
	}
	public function register($uname,$ucogn,$umail,$upass,$udata,$uluogo,$uresidenza,$utel)
	{
		try
		{
			
			$utip='Semplice';
			$stmt = $this->conn->prepare("INSERT INTO Utente(Email, Nome, Cognome, Password, Tipologia, Data_Nascita, Luogo_Nascita, Indirizzo_Residenza, Telefono) 
		                                               VALUES(:umail, :uname, :ucogn, :upass, :utip, :udata, :uluogo, :uresidenza, :utel)");
												  
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":ucogn", $ucogn);		
			$stmt->bindparam(":utip", $utip);									  
			$stmt->bindparam(":upass", $upass);
			$stmt->bindparam(":udata", $udata);
			$stmt->bindparam(":uluogo", $uluogo);
			$stmt->bindparam(":uresidenza", $uresidenza);	
			$stmt->bindparam(":utel", $utel);
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function Insertmsg($mailm,$maild,$titolo,$tipo,$text,$data)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO Messaggio(Email_Mittente,Email_Destinatario,Titolo,Tipo,Testo_Messaggio,DataInvio) VALUES (:mailm,:maild,:titolo,:tipo,:text,:data)");
								  
			$stmt->bindparam(":mailm", $mailm);
			$stmt->bindparam(":maild", $maild);
			$stmt->bindparam(":titolo",$titolo);
			$stmt->bindparam(":tipo",$tipo);
			$stmt->bindparam(":text", $text);		
			$stmt->bindparam(":data", $data);									  
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	public function InsertBici($mailm, $id, $date1, $date2)
	{
		try
		{
			$stmt = $this->conn->prepare("INSERT INTO Prenotazione_Bici(EmailUtente,IdBici,Data_Inizio,Data_Fine) VALUES (:mailm,:id,:date1,:date2)");
												  
			$stmt->bindparam(":mailm", $mailm);
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":date1", $date1);		
			$stmt->bindparam(":date2", $date2);									  
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			
			$this->errorSetter($e->getMessage());
		}				
	}
	public function InsertVeicoli($mailm, $targa, $date1, $date2)
	{
		try
		{
			$stmt = $this->conn->prepare("CALL PrenotazioneVeicolo(:mailm,:targa,:date1,:date2)");
												  
			$stmt->bindparam(":mailm", $mailm);
			$stmt->bindparam(":targa", $targa);
			$stmt->bindparam(":date1", $date1);		
			$stmt->bindparam(":date2", $date2);									  
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			
			$this->errorSetter($e->getMessage());
		}				
	}
	public function InsertSegnalazione($id,$mailm, $titolo, $testo)
	{
		try
		{
			$stmt = $this->conn->prepare("CALL InserimentoSegnalazione(:id,:mailm,:titolo,:testo)");
												  
			$stmt->bindparam(":id", $id);
			$stmt->bindparam(":mailm", $mailm);
			$stmt->bindparam(":titolo", $titolo);		
			$stmt->bindparam(":testo", $testo);									  
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			
			$this->errorSetter($e->getMessage());
		}				
	}
	public function doLogin($umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT * FROM Utente WHERE Email=:umail AND Password=:upass ");
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $upass);
			$stmt->execute();
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
					$_SESSION['user_email'] = $userRow['Email'];
					$_SESSION['user_tipologia'] = $userRow['Tipologia'];
					return true;
			}
			else{
				return false;
				}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_email']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_email']);
		return true;
	}

}
?>