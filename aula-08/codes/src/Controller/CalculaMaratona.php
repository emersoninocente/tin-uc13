<?php
class CalculaMaratona {
    // Atributos
    private int $duracaoMaratona = 0;

    public function inclui(Titulo $titulo): void {
        // Lógica para incluir uma nova maratona
        $this->duracaoMaratona += $titulo->duracaoEmMinutos();
    }

    public function duracao(): int {
        return $this->duracaoMaratona;
    }
}
?>