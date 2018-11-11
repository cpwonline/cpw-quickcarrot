<!--MODALES-->
    <!--Modal de conf_borrar_gen-->
    <div class="gen_modal" id="conf_borrar_gen">
            <div class="modal-content">
                <div class="header otro"><h2>Confirmaci&oacute;n</h2></div>
                <div class="copy" id="copy">
                    <p style="text-align: center;">
                        <span tag="1">¿Est&aacute; seguro de borrar</span>
                        <span tag="2"></span>
                    </p>
                </div>
                <div class="cf footer">
                    <section class="cont_a">
                        <a class="w3-btn w3-gray" onclick="$('#quickCarrot #conf_borrar_gen').css('display','none');" tag="cancelar">Cancelar</a>
                        <a class="w3-btn w3-deep-orange" tag="si" href="#">S&iacute;</a>
                    </section>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    <!--Modal de conf_borrar_gen-->
    
    <!--Modal de conf_editar_gen-->
        <div class="gen_modal" id="conf_editar_gen">
            <div class="modal-content">
                <div class="header otro"><h2>Edici&oacute;n</h2></div>
                <div class="copy" id="copy">
                    <p style="text-align: center;">

                        <!--Edición de menús-->
                            <div class="div_ediciones" tag="editar_menus">
                                <div class="tabla_gen">
                                    <div class="fil">
                                        <div class="cam">T&iacute;tulo:</div>
                                        <div class="cam"><input type="text" name="e_m_titulo" placeholder="Escriba el t&iacute;tulo de su men&uacute;"/></div>
                                    </div>
                                    <div class="fil">
                                        <div class="cam">Posici&oacute;n:</div>
                                        <div class="cam">
                                            <select name="e_m_posicion">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fil">
                                        <span tag="1">¿Est&aacute; seguro de editar </span>
                                        <span tag="2"></span>
                                        <div class="cam"><a class="w3-btn w3-deep-orange" tag="e_guarda_menu">Guardar</a></div>
                                    </div>
                                </div>
                            </div>
                        <!--Edición de submenús-->
                            <div class="div_ediciones" tag="editar_sub">
                                <div class="tabla_gen">
                                    <div class="fil">
                                        <div class="cam">T&iacute;tulo:</div>
                                        <div class="cam"><input type="text" name="e_s_titulo" placeholder="Escriba el t&iacute;tulo de su submen&uacute;"/></div>
                                    </div>
                                    <div class="fil">
                                        <div class="cam">Posici&oacute;n:</div>
                                        <div class="cam">
                                            <select name="e_s_posicion">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="fil">
                                        <span tag="1">¿Est&aacute; seguro de editar </span>
                                        <span tag="2"></span>
                                        <div class="cam"><a class="w3-btn w3-deep-orange" tag="e_guarda_sub">Guardar</a></div>
                                    </div>
                                </div>
                            </div>
                    </p>
                </div>
                <div class="cf footer">
                    <section class="cont_a">
                        <a class="w3-btn w3-gray" onclick="$('#quickCarrot #conf_editar_gen').css('display','none');" tag="cancelar">Cancelar</a>
                    </section>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    <!--Modal de conf_editar_gen-->
    