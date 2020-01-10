Select idtb_pedido, data_pedido, cod_barras, fk_produto, tb_pedido_produto.quantidade, idtb_cliente, nome_cliente, status  from (((tb_pedido
inner join tb_cliente on fk_cliente = tb_cliente.idtb_cliente)
inner join tb_pedido_produto on idtb_pedido = fk_pedido )
inner join tb_produto on fk_produto = idtb_produto);

INSERT INTO tb_pedido (data_pedido, cod_barras, fk_cliente, status) VALUES ("2019-01-01 00:00:00", "123123", '1', 1 );
INSERT INTO tb_pedido_produto (fk_pedido, fk_produto, quantidade) VALUES (last_insert_id(), '1', 100 );
