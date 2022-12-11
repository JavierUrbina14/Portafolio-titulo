<?php

namespace Controllers;

use Model\Productos;
use Model\Carrito;
use Model\Pago;
use Model\Pagopaypal;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class APIController {
    public static function index()
    {
        $productos = Productos::all();

        echo json_encode($productos);
    }
    public static function pago()
    {
        $pago = Pago::all();

        $respuesta = [
            'pago' => $pago
        ];

        echo json_encode($pago);

        

    }
    public static function ordenar()
    {
        $carrito = new Carrito($_POST);
        
        $respuesta = $carrito->insercionCarro();
        /*$respuesta = [
            'hola' => $carrito
        ];*/
        echo json_encode($respuesta);
    }
    public static function pagopaypal()
    {
        $mail = new PHPMailer();
        $pagopaypal = new Pagopaypal($_POST);
        $pago = Pago::all();
        foreach ($pago as $llave){
            $cliente = $llave->cliente;
            $producto = $llave->producto;
            $precio = $llave->total;
            $cantidad = $llave->cantidad;

            $contenidorecibo .= '<p style="margin-top: 0; margin-bottom: 10px;  font-size: 18px; padding: 10px; color: #F5B647">' .$cantidad. ' x '.$producto.' = $' .$precio. '</p>';
        }

        
        //configuracion email
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'c.restaurantsigloxxi@gmail.com';
        $mail->Password = 'ueejmpewueclqhra';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
        //configurar el Contenido Email
        $mail->setFrom('c.restaurantsigloxxi@gmail.com');
        $mail->addAddress('htorres332.jt@gmail.com', 'Javier User');
        $mail->Subject = 'Recibo restaurante';

        //Habilitar html

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        //Definir el contenido

        $contenido = '<!DOCTYPE html>
        <html lang="en" xmlns="https://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
        <head>
            <meta charset="utf-8">
            <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="x-apple-disable-message-reformatting">
            <title></title>
            <!--[if mso]>
            <style>
                table {border-collapse:collapse;border-spacing:0;border:none;margin:0;}
                div, td {padding:0;}
                div {margin:0 !important;}
            </style>
            <noscript>
                <xml>
                    <o:OfficeDocumentSettings>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                    </o:OfficeDocumentSettings>
                </xml>
            </noscript>
            <![endif]-->
            <style>
                table, td, div, h1, p {
                    font-family: Arial, sans-serif;
                }
        
                .parrafos {
                    display: flex;
                }
                .pf-Monto {
                    padding-left: 200px;
                }
        
                @media screen and (max-width: 530px) {
                    .unsub {
                        display: block;
                        padding: 8px;
                        margin-top: 14px;
                        border-radius: 6px;
                        background-color: #555555;
                        text-decoration: none !important;
                        font-weight: bold;
                    }
        
                    .col-lge {
                        max-width: 100% !important;
                    }
        
                }
        
                @media screen and (min-width: 531px) {
                    .col-sml {
                        max-width: 27% !important;
                    }
        
                    .col-lge {
                        max-width: 73% !important;
                    }
                }
            </style>
        </head>
        <body style="margin:0;padding:0;word-spacing:normal;background-color:#FFFF;">
            <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; background-color: #FFFF;">
                <table role="presentation" style="width:100%;border:none;border-spacing:0;">
                    <tr>
                        <td align="center" style="padding:0;">
                            <!--[if mso]>
                            <table role="presentation" align="center" style="width:600px;">
                            <tr>
                            <td>
                            <![endif]-->
                            <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
                                <tr>
                                    <td style="padding: 30px; background: #E0F2F1; border-top-right-radius: 20px; border-top-left-radius: 20px ">
                                        <h1 style="margin-top: 0; margin-bottom: 16px; font-size: 50px; line-height: 32px; font-weight: normal; letter-spacing: -0.02em; color: #146356; text-align: center">Siglo XXI</h1>
                                        <h1 style="margin-top: 0; margin-bottom: 16px; font-size: 25px; line-height: 32px; font-weight: normal; letter-spacing: -0.02em; color: #146356; text-align: center">Restaurant</h1>
                                        <p style="margin: 0; font-size: 16px; color: black; font-style: oblique; margin: 0px 55px 0px 40px">Nos gustó conocerte y que probaras nuestras exquisitas recetas, esperamos verte nuevamente en nuestro restaurant.</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 35px 0px 11px 30px; font-size: 0; background-color: #146356; border-bottom: 1px solid #f0f0f5; border-color: rgba(201,201,207,.35);">
                                        <div class="col-lge" style="display: inline-block; width: 100%; max-width: 395px; vertical-align: top; padding-bottom: 10px; font-family: Arial,sans-serif; font-size: 16px; line-height: 22px; color: #363636;">
                                            <p style="margin-top: 0; margin-bottom: 5px;  font-size: 18px; padding: 10px; color: #F5B647">Gracias por preferirnos, '. $cliente . '.</p>
                                            <p style="margin-top: 0; margin-bottom: 10px;  font-size: 18px; padding: 10px; color: #F5B647">Hemos adjuntado el recibo de tu compra en Restaurant SigloXXI.</p>
                                        </div>
                                        <div><p style="margin-top: 0; margin-bottom: 10px; font-size: 18px; padding: 10px; color: #f0f0f5">-------------------------------------------------</p></div>
                                        <div>' .$contenidorecibo.' </div>
                                        <!--[if mso]>
                                        </td>
                                        </tr>
                                        </table>
                                        <![endif]-->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 30px; font-size: 24px; line-height: 28px; font-weight: bold; background-color: #146356; border-bottom: 1px solid #f0f0f5; border-color: rgba(201,201,207,.35); color: #F5B647;  border-bottom-left-radius:20px; border-bottom-right-radius:20px">
                                        <div class="parrafos">
                                            <p  style="margin: 0px 0px 0px 30px; ;">Total:</p>
                                            <p class="pf-Monto" style="margin: 0px 0px 0px 30px; ;"> $' . $pagopaypal->total_newventa .'</p>
                                        </div>
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:10px;"></td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px; background-color: #E0F2F1; border-top: 0px solid #939297; border-top-right-radius: 20px; border-top-left-radius: 20px">
                                        <p style="font-size: 16px; color: black; font-style: oblique;">
                                            "Sabemos que quieres volver, es por ello por lo que te presentamos nuestro nuevo sistema de reserva vía Web.
                                        </p>
                                        <p style="font-size: 16px; color: black; font-style: oblique;">
                                            Encontraras toda la información sobre el proceso de reserva visitando nuestra página web: www.RestaurantSigloXXI/Reservas.cl"
                                        </p>
                                        <p style="font-size: 16px; color: black; font-style: oblique;">
                                            Codigo de transaccion: '. $pagopaypal->clavetransaccion .'</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 30px; text-align: center; font-size: 12px; background-color: #146356; color: #F5B647; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px ">
                                        <p style="margin:0;font-size:14px;line-height:20px;">Este correo electrónico se genera automáticamente. Por favor, no responder a él. Si necesitas ayuda adicional, por favor, contacte al comercio al +56 248325255.<br></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px;"></td>
                                </tr>
                                <tr>
                                    <td style="padding: 20px; text-align: center; font-size: 16px; background-color: #146356; color: #F5B647; border-bottom-left-radius: 20px; border-bottom-right-radius: 20px; border-top-right-radius: 20px; border-top-left-radius: 20px ">
                                        <p style="margin:0;line-height:15px;"><br>&reg;RestaurantSigloXXI, 2022 - Todos los derechos reservados</p>
                                    </td>
                                </tr>
                            </table>
                            <!--[if mso]>
                            </td>
                            </tr>
                            </table>
                            <![endif]-->
                        </td>
                    </tr>
                </table>
            </div>
        </body>
        </html>
        ';

        $mail->Body = $contenido;
        $mail->AltBody = 'texto alternativo sin html';

        //enviar el email

        $mail->send();

        
        
        $respuesta = $pagopaypal->insercionpaypal();
        
        echo json_encode($respuesta);
    }
}