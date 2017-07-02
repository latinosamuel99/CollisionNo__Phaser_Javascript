
-- Criacao da Tabela referente ao jogo Phaser
create table game(
code INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (code),
name varchar(100),
nameGame varchar(100),
points int )
AUTO_INCREMENT = 1;

-- Listagem de todos os jogos com a respetiva pontuacao adquirida
select * from game;

 -- Trigger Concatenacao do nome do jogo com o codigo gerado automaticamente
DELIMITER //
CREATE TRIGGER automatedNameGame BEFORE INSERT ON game FOR EACH ROW
BEGIN
   DECLARE next_id INT;
   SET next_id = (SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA=DATABASE() AND TABLE_NAME='game');
   SET NEW.nameGame=CONCAT(New.name,' ',next_id);
END//

