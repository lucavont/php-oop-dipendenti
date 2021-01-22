<?php 

class Persona {
    private $nome;
    private $cognome;
    private $codice_fiscale;

    public function __construct($nome, $cognome, $codice_fiscale){

        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->codice_fiscale = $codice_fiscale;
    }

    public function to_string(){
        return 'Nome: '.$this->nome.'<br> Cognome: '.$this->cognome.'<br> Codice Fiscale: '.$this->codice_fiscale;
    }
}

class Impiegato extends Persona {

    private $codice_impiegato;
    private $compenso;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso){

        
        parent::__construct($nome, $cognome, $codice_fiscale);
        
        if (!ctype_alpha($nome)) {
            throw new Exception('Il nome deve contenere solo lettere');
         }
         
        $this->codice_impiegato = $codice_impiegato;
        $this->compenso = $compenso;
    }

    public function to_string() {
        $data = parent::to_string();
        $data .= '<br>Codice Impiegato: '.$this->codice_impiegato.'<br>Compenso: '.$this->compenso;
        return $data;
    }
    
}

class ImpiegatoSalariato extends Impiegato{
    private $giorni_lavorati;
    private $compenso_giornaliero;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso, $giorni_lavorati, $compenso_giornaliero){
        
        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso);

        $this->giorni_lavorati = $giorni_lavorati;
        $this->compenso_giornaliero = $compenso_giornaliero;
    }

    public function calcola_compenso(){
        $compensoS = $this->giorni_lavorati*$this->compenso_giornaliero;
        return $compensoS;
    }

    public function to_string() {
        $data = parent::to_string();
        $data .= '<br>Bonus Compenso Salariato: '.self::calcola_compenso();
        return $data;
    }
}

class ImpiegatoAOre extends Impiegato{
    private $ore_lavorate;
    private $compenso_orario;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso, $ore_lavorate, $compenso_orario){

        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso);

        $this->ore_lavorate = $ore_lavorate;
        $this->compenso_orario = $compenso_orario;
    }

    public function calcola_compenso(){
        $compensoOre = $this->ore_lavorate*$this->compenso_orario;
        return $compensoOre;
    }

    public function to_string(){
        $data = parent::to_string();
        $data.= '<br>Bonus Impiegato a Ore: '.self::calcola_compenso();
        return $data;
    }
}

class ImpiegatoSuCommissione extends Impiegato{
    use Progetto;

    public function __construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso, $nome_progetto, $commissione_progetto){

        parent::__construct($nome, $cognome, $codice_fiscale, $codice_impiegato, $compenso);

        $this->nome_progetto = $nome_progetto;
        $this->commissione_progetto = $commissione_progetto;
    }

    public function calcola_compenso(){
        return $this->commissione_progetto;
    }

    public function to_string(){
        $data = parent::to_string();
        $data .= '<br>Nome Progetto: '.$this->nome_progetto.'<br> Commissione Progetto'.self::calcola_compenso();
        return $data;
    }
}

trait Progetto {
    public $nome_progetto;
    public $commissione_progetto;
}

