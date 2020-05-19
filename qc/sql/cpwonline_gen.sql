#Tablas
    #articulos
        #a_imagen
        #a_id
        #a_des_c
        #a_contenido
        #a_usuario
        #a_freg
    #menus
        #m_id-
        #m_freg-
        #m_titulo-
        #m_sub bool
        #m_posicion-
        #m_url-
        #m_usuario-
        #m_borrable-
    #submenus
        #s_id
        #s_titulo
        #s_menu
        #s_freg
        #s_posicion
        #s_usuario
    #diagnosticos
        #d_id
        #d_titulo
        #d_estado
        #d_cont
        #d_usuario
        #d_freg
        #d_resuelto
    #informaciones
        #d_id, i_menu, i_sub, i_titulo, i_titulo_letra, i_contenido, i_contenido_fondo
        #i_contenido_borde, i_contenido_letra, i_posicion, i_usuario, i_disegno, i_freg
    #estadisticas
        #e_id
        #e_ayer_1
        #e_ayer_2
        #e_ayer_3
        #e_ayer_4
        #e_ayer_5
        #e_ayer_6
        #e_semana_1
        #e_semana_2
        #e_semana_3
        #e_semana_4
        #e_semana_5
        #e_semana_6
        #e_semana_7
        #e_mes_1
        #e_mes_2
        #e_mes_3
        #e_mes_4
        #e_agno_1
        #e_agno_2
        #e_agno_3
        #e_agno_4
        #e_agno_5
        #e_agno_6
        #e_agno_7
        #e_agno_8
        #e_agno_9
        #e_agno_10
        #e_agno_11
        #e_agno_12

# Generalidades
    #id: int hasta 5
    #nombre, clave: varchar hasta 20
    #titulo: varchar hasta 100
    #url: text hasta 500
    #freg: date solo fecha
    #posicion: int hasta 2

#Base de datos general para QuickCarrot

CREATE TABLE usuarios(
    #usuarios
        u_id int(5) NOT NULL AUTO_INCREMENT,
        u_nombre varchar(20) NOT NULL,
        u_clave varchar(20) NOT NULL,
        u_estado varchar(10) NOT NULL,
        u_control varchar(10) NOT NULL,
        PRIMARY KEY(u_id)
);