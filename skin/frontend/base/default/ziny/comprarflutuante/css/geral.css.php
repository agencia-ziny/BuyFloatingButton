<?php

/**
 * Botão de Compra Flutuante
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 *
 * @category   skin
 * @package    default_ziny
 * @copyright  Copyright (c) 2015 Agência Ziny (www.agenciaziny.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Agência Ziny <dev@agenciaziny.com.br>
 */

define('MAGENTO_ROOT', (dirname(__FILE__).'../../../../../../../../'));

// Mage include
require_once MAGENTO_ROOT . 'app/Mage.php';

umask(0);
Mage::app();

// Get defines
$config = Mage::getStoreConfig('comprarflutuante/geral');

header("Content-type: text/css; charset: UTF-8");
?>
#_comprar-flutuante, ._comprar-flutuante-fechado, ._comprar-flutuante #_area-comprar-flutuante:before, #_comprar-flutuante .add-to-cart-buttons, #_comprar-flutuante .add-to-cart-buttons .button {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
#_comprar-flutuante {
    position: fixed;
    <?php echo $config['caixa_lado'];?>: <?php echo $config['distancia_lateral'];?>;
    top: <?php echo $config['distancia_topo'];?>;
    background: #<?php echo $config['cor_fundo'];?>;
    border: 1px solid #<?php echo $config['cor_borda'];?>;
    <?php if ($config['caixa_lado'] == 'right'):?>
    box-shadow: 2px 2px 1px 0 #<?php echo $config['cor_sombra'];?>;
    <?php else: ?>
    box-shadow: -2px 2px 1px 0 #<?php echo $config['cor_sombra'];?>;
    <?php endif; ?>
    opacity:0;
    filter: alpha(opacity=0);
    padding: 20px;    
    width: <?php echo ($config['caixa_tamanho']) == '' ? '260px' : $config['caixa_tamanho'];?>;
    z-index:999999;
    -webkit-transition: 150ms all linear 0s;
    -moz-transition: 150ms all linear 0s;
    -o-transition: 150ms all linear 0s;
    transition: 150ms all linear 0s;
}
#_comprar-flutuante._bloco-exibir {
    -webkit-transition: 150ms all linear 0s;
    -moz-transition: 150ms all linear 0s;
    -o-transition: 150ms all linear 0s;
    transition: 150ms all linear 0s;
    opacity:1 !important;
    filter: alpha(opacity=100) !important;
}
#_comprar-flutuante._comprar-flutuante-fechado {
    <?php echo $config['caixa_lado'];?>: -<?php echo ($config['caixa_tamanho']) == '' ? '260px' : $config['caixa_tamanho'];?>;
    -webkit-transition: 150ms all linear 0s;
    -moz-transition: 150ms all linear 0s;
    -o-transition: 150ms all linear 0s;
    transition: 150ms all linear 0s;
}
#_comprar-flutuante #_area-comprar-flutuante:before {
    background-color: #<?php echo $config['cor_esconder'];?>;
    border-top: 1px solid #<?php echo $config['cor_borda'];?>;
    border-bottom: 2px solid #<?php echo $config['cor_borda'];?>;
    <?php if ($config['caixa_lado'] == 'right'):?>
    left: -25px;
    border-left: 1px solid #<?php echo $config['cor_borda'];?>;
    -webkit-border-radius:3px 0 0 3px;
    -moz-border-radius:3px 0 0 3px;
    -o-border-radius:3px 0 0 3px;
    border-radius:3px 0 0 3px;
    content: '˃';
    <?php else: ?>
    right: -25px;
    border-right: 1px solid #<?php echo $config['cor_borda'];?>;
    -webkit-border-radius:0 3px 3px 0;
    -moz-border-radius:0 3px 3px 0;
    -o-border-radius:0 3px 3px 0;
    border-radius:0 3px 3px 0;
    content: '<';
    <?php endif; ?>
    color:#<?php echo $config['fonte_esconder'];?>;;
    cursor: pointer;
    display: block;
    font: 700 15px/24px Arial, sans-serif;
    height: 25px;
    position: absolute;
    text-align: center;
    top: -1px;
    width: 25px;
    z-index: 99999;
    -webkit-transition: 150ms all linear 0s;
    -moz-transition: 150ms all linear 0s;
    -o-transition: 150ms all linear 0s;
    transition: 150ms all linear 0s;
}
#_comprar-flutuante #_area-comprar-flutuante:hover:before, #_comprar-flutuante._comprar-flutuante-fechado #_area-comprar-flutuante:before {
    display: block;
    background-color: #<?php echo $config['cor_escondido'];?>;
    border-bottom:1px solid #<?php echo $config['cor_borda'];?>;
    color: #<?php echo $config['fonte_escondido'];?>;
    -webkit-transition: 150ms all linear 0s;
    -moz-transition: 150ms all linear 0s;
    -o-transition: 150ms all linear 0s;
    transition: 150ms all linear 0s;
}
#_comprar-flutuante._comprar-flutuante-fechado #_area-comprar-flutuante:before {
    <?php if ($config['caixa_lado'] == 'right'):?>
    content: '<';
    <?php else: ?>
    content: '>';
    <?php endif; ?>
}
#_comprar-flutuante .price-info, #_comprar-flutuante .price-box {
    display: block;
    float: none;
    max-width: 100%;
    margin: 0;
    padding: 0;
    text-align: left;
    width: 100%;
}
#_comprar-flutuante .old-price, #_comprar-flutuante .special-price {
    display: block;
    text-align: left;
    padding: 3px 0;
}
#_comprar-flutuante .old-price {
    color: #d4d4d4;
    font-size: 12px;
    line-height: 15px;
    text-decoration: line-through;
}
#_comprar-flutuante .special-price {
    color: #2a2a2a;
    font-size: 18px;
    line-height: 22px;
}
#_comprar-flutuante .special-price .price {
    font-weight: 700;
}
#_comprar-flutuante .add-to-cart-buttons {
    border-top: 1px solid #f7f7f7;
    display: block;
    float: none;
    margin-top: 10%;
    padding-top: 10px;
    text-align: center;
}
#_comprar-flutuante .add-to-cart-buttons .button {
    display: block;
    float: none;
    width: 100%;
}