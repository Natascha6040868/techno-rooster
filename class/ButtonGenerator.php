<?php
class ButtonGenerator
{
    private $buttons;

    // Constructor om de knoppen array in te stellen
    public function __construct($buttons)
    {
        $this->buttons = $buttons;
    }

    // Methode om knoppen te genereren met links naar verschillende webpagina's
    public function generateButtons()
    {
        foreach ($this->buttons as $label => $url) {
            echo "<a href='$url'><button class='button'>$label</button></a>";
        }
    }
}
?>