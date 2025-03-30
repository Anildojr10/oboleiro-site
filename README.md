# 🍰 O Boleiro Bolos - Sistema de Pedidos Online

Este projeto é um site completo para a empresa **O Boleiro Bolos**, desenvolvido com a pilha LAMP (Linux, Apache, MariaDB e PHP), e projetado para ser implantado em uma instância EC2 da AWS.

---

## 🚀 Funcionalidades

- Exibição de cardápio com produtos cadastrados no banco
- Registro de pedidos com nome do cliente, item, quantidade e preço
- Histórico de pedidos realizados
- Implantação automatizada via script *user data*

---

## 🛠️ Tecnologias Utilizadas

- PHP 7.4
- Apache 2
- MariaDB
- HTML/CSS
- AWS EC2 (Amazon Linux 2)

---

## 📁 Estrutura do Projeto

```
oboleiro-site/
├── index.php
├── menu.php
├── processar_pedido.php
├── historico.php
├── style.css
├── imagens/
│   ├── bolo1.jpg
│   ├── torta1.jpg
│   └── salgado1.jpg
└── db.sql
```

---

## ☁️ Implantação na AWS

Durante a criação da instância EC2 (Amazon Linux 2), insira o script abaixo no campo **user data**:

```bash
#!/bin/bash
yum update -y
amazon-linux-extras enable php7.4
yum install -y php php-mysqlnd httpd mariadb-server git

systemctl enable httpd
systemctl start httpd

systemctl enable mariadb
systemctl start mariadb

cd /var/www/html
rm -rf *
git clone https://github.com/Anildojr10/oboleiro-site.git .

mysql -u root <<EOF
$(cat db.sql)
EOF

chown -R apache:apache /var/www/html
chmod -R 755 /var/www/html
```

⚠️ **Importante**: certifique-se de liberar as portas 22 (SSH) e 80 (HTTP) no grupo de segurança da instância.

---

## 🧪 Testes

- Acesse `http://<ip-da-instancia>/menu.php` para fazer um pedido
- Veja `http://<ip-da-instancia>/historico.php` para consultar pedidos realizados

---

## 🤝 Contribuições

Sinta-se à vontade para abrir *issues* ou enviar *pull requests* com sugestões, melhorias ou correções.

---

## 👨‍🍳 Feito para O Boleiro Bolos

Sistema desenvolvido com carinho e fome por tecnologia ☕🍰  
