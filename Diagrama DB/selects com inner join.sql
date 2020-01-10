Select idtb_pedido, data_pedido, cod_barras, nome_cliente, fk_produto, tb_pedido_produto.quantidade, valor_unitario_produto  from (((tb_pedido
inner join tb_cliente on fk_cliente = tb_cliente.idtb_cliente)
inner join tb_pedido_produto on idtb_pedido = fk_pedido )
inner join tb_produto on fk_produto = idtb_produto);