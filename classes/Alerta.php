<?php
class Alerta
{
    /**
     * Registra una alerta en el sistema y la guarda en la sesión que corresponda.
     * @param string $tipo El tipo de alerta (success, info, warning, danger)
     * @param string $mensaje El mensaje de la alerta en sí
     */
    public function registrar_alerta(string $tipo, string $mensaje)
    {
        $_SESSION['alertas'][] = [
            'tipo' => $tipo,
            'mensaje' => $mensaje
        ];
    }

    /**
     * Vacía la lista de alertas de la sesión de referencia.
     */
    public function vaciar_alertas()
    {
        $_SESSION['alertas'] = [];
    }

    /**
     * Devuelve la lista completa de alertas acumuladas en la sesión y luego vacía la lista.
     * @return string
     */
    public function mostrar_alertas(): ?string
    {
        if (!empty($_SESSION['alertas'])) {
            $alertasGuardadas = '';

            foreach ($_SESSION['alertas'] as $alerta) {
                $alertasGuardadas .= $this->imprimir_alerta($alerta);
            }

            $this->vaciar_alertas();
            return $alertasGuardadas;
        } else {
            return null;
        }
    }

    /**
     * Imprime en pantalla una alerta en función de lo que recibe por parámetros
     * @param string $alerta El tipo y mensaje de la alerta de referencia
     */
    private function imprimir_alerta($alerta): string
    {
        $html = "<div class='alert alert-{$alerta['tipo']} alert-dismissible fade show' role='alert'>";
        $html .= $alerta['mensaje'];
        $html .= "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        $html .= "</div>";
        return $html;
    }
}
