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
;window.onload = function () {

    var i,
            $_precos = document.getElementsByClassName('price'),
            $_acaoArea = document.getElementById("_area-comprar-flutuante"),
            $_acaoAdiciona = document.getElementById('_comprar-flutuante'),
            _preco,
            _item,
            _itemFlutuante;

    for (i = 0; i < $_precos.length; i++) {
        
        if ($_precos[i].id !== '' && $_precos[i].id !== null && $_precos[i].id !== 'undefined'){
            
            _preco = $_precos[i].id;
        }
        else {
            _preco = $_precos[i].parentNode.id;
        }
        
        _item = document.getElementById(_preco);

        _itemFlutuante = document.getElementById(_preco + '-comprar-flutuante');

        if ((typeof (_item) !== undefined && _item !== null) && (typeof (_itemFlutuante) !== undefined && _itemFlutuante !== null)) {

            _item.addEventListener("DOMSubtreeModified", function () {

                if (this.innerHTML !== null && this.innerHTML !== '') {

                    var _itemDefinido = document.getElementById(this.id + '-comprar-flutuante');

                    if (typeof (_itemDefinido) !== undefined && _itemDefinido !== null) {

                        _itemDefinido.innerHTML = this.innerHTML;
                    }
                }
            }, false);
        }
    }

    var ComprarFlutuante = function () {

        var _areaSuperior,
                _documento = document.documentElement,
                _acaoScroll = (window.pageYOffset || _documento.scrollTop) - (_documento.clientTop || 0),
                _btnCart = document.getElementsByClassName('btn-cart')[0],
                _area = $_acaoAdiciona,
                _movimentoScroll = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;

        if (typeof _btnCart !== 'undefined') {

            _areaSuperior = _btnCart.getBoundingClientRect().top + _movimentoScroll;

            if (_acaoScroll <= _areaSuperior - 50) {

                _area.className = _area.className.replace(/\b_bloco-exibir\b/gi, '');
            } else {
                if (_area.className.search(/\b_comprar-flutuante-fechado\b/gi) !== -1) {

                    _area.className = '_bloco-exibir _comprar-flutuante-fechado';

                } else {
                    _area.className = '_bloco-exibir';
                }
            }
        }
    };

    if (typeof ($_acaoArea) !== undefined && $_acaoArea !== null) {

        $_acaoArea.onclick = function () {

            var $_area = $_acaoAdiciona;

            if ($_area.className.search(/\b_comprar-flutuante-fechado\b/gi) !== -1) {

                $_area.className = $_area.className.replace(/\b _comprar-flutuante-fechado\b/gi, '');
            } else {

                $_area.className += ' _comprar-flutuante-fechado';
            }
        };
    }

    ComprarFlutuante();

    window.onscroll = function () {

        ComprarFlutuante();
    };
};