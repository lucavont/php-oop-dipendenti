<?php 

class Persona {
    public $nome;
    public $cognome;
    public $codice_fiscale;


    public function to_string(){
        echo 'Nome: '.$this->nome.'<br> Cognome: '.$this->cognome.'<br> Codice Fiscale: '.$this->codice_fiscale;
    }
}

class Impiegato extends Persona {

    public $codice_impiegato;
    public $compenso;

    public function parentToString() {
        parent::to_string();
    }
    
}

class ImpiegatoSalariato extends Impiegato{
    public $giorni_lavorati;
    public $compenso_giornaliero;

    public function calcola_compenso(){
        return $this->giorni_lavorati*$this->compenso_giornaliero;
    }
}

class ImpiegatoAOre extends Impiegato{
    public $ore_lavorate;
    public $compenso_orario;

    public function calcola_compenso(){
        return $this->ore_lavorate*$this->compenso_orario;
    }
}

class ImpiegatoSuCommissione extends Impiegato{
    use Progetto;

    public function calcola_compenso(){
        return $this->commissione_progetto;
    }
}

trait Progetto {
    public $nome_progetto;
    public $commissione_progetto;
}

$dipendente1 = new ImpiegatoSuCommissione();
$dipendente1->nome = 'Luca';
$dipendente1->cognome = 'Cavretti';
$dipendente1->codice_fiscale = 'CVRLCU94M01D548W';
$dipendente1->commissione_progetto = 10;