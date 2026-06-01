# Docker Setup para Projeto ZenEstoque

## Requisitos

- Docker
- Docker Compose

## Como usar

### 1. Build da imagem

```bash
docker-compose build
```

### 2. Iniciar os containers

```bash
docker-compose up -d
```

### 3. Acessar a aplicação

Abra seu navegador em: `http://localhost`

### 4. Parar os containers

```bash
docker-compose down
```

## Configuração

### Usando banco de dados remoto (padrão)

O projeto está configurado para conectar ao banco de dados remoto em `zephyr.proxy.rlwy.net:57309`. As credenciais estão definidas em `docker-compose.yml`.

### Usando banco de dados local (MySQL)

Se você quiser usar MySQL local durante desenvolvimento:

1. Descomente a seção `db:` em `docker-compose.yml` (já está descomentada)
2. O MySQL estará disponível em `localhost:3306`
3. Modifique `resources/dao/Conexao.php` para conectar ao host `db` (nome do serviço) em vez do remoto

Exemplo:
```php
$servidor = "db";  // ao invés de "zephyr.proxy.rlwy.net"
$porta = "3306";   // ao invés de "57309"
```

## Comandos úteis

### Ver logs do web
```bash
docker-compose logs -f web
```

### Ver logs do MySQL
```bash
docker-compose logs -f db
```

### Acessar o container web
```bash
docker-compose exec web bash
```

### Acessar o MySQL
```bash
docker-compose exec db mysql -u root -p
```

## Estrutura de volumes

- `./test-main:/var/www/html` - Código da aplicação (live reload)
- `db_data` - Dados persistentes do MySQL

## Troubleshooting

### Erro de permissão de arquivo
Se receber erros de permissão, execute:
```bash
docker-compose exec web chown -R www-data:www-data /var/www/html
```

### Porta 80 já em uso
Modifique a porta em `docker-compose.yml`:
```yaml
ports:
  - "8080:80"  # Acesse em http://localhost:8080
```

### Erro de conexão ao banco de dados
- Verifique as credenciais em `Conexao.php`
- Se usar banco remoto, confirme a conectividade de rede
- Se usar MySQL local, aguarde 15-20 segundos após `docker-compose up` para o MySQL inicializar
