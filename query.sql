CREATE TABLE roles (
    id INT NOT NULL AUTO_INCREMENT,
    name text,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, 
    PRIMARY KEY (id)
)
CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    password TEXT NOT NULL,
    email TEXT NOT NULL,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    role_id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (role_id) REFERENCES roles (id)
      ON DELETE SET NULL
)

INSERT INTO roles (name) VALUES 
 ('ADMIN'), 
 ('STAFF')


INSERT INTO users
 (name, password, email) VALUES
 ('Sem','password1','sem.hernandez@utsc.edu.mx'),
 ('Sem1','passwords','sem.hernandez1@utsc.edu.mx')

UPDATE users set role_id = 1 where id = 1