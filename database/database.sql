CREATE TABLE status (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE language (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE type_reaction (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE author (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE category (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE classification (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pay_method (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(255),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE plan_type (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(255),
    import DECIMAL(10,2),
    devices INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE card (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    description VARCHAR(255),
    name_bank VARCHAR(50),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    username VARCHAR(255),
    password VARCHAR(255),
    phone CHAR(10),
    status_id INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_status FOREIGN KEY (status_id) REFERENCES status(id)
);

CREATE TABLE profile (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    language_id INT,
    user_id INT,
    classification_id INT,
    status_id INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_language FOREIGN KEY (language_id) REFERENCES language(id),
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES user(id),
    CONSTRAINT fk_classification FOREIGN KEY (classification_id) REFERENCES classification(id),
    CONSTRAINT fk_status FOREIGN KEY (status_id) REFERENCES status(id)
);

CREATE TABLE video (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(255),
    category_id INT,
    classification_id INT,
    url_video VARCHAR(255),
    key_video VARCHAR(255),
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES category(id),
    CONSTRAINT fk_classification FOREIGN KEY (classification_id) REFERENCES classification(id)
);

CREATE TABLE profile_like (
    id SERIAL PRIMARY KEY,
    profile_id INT,
    video_id INT,
    add_my_list BOOLEAN DEFAULT FALSE,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_profile FOREIGN KEY (profile_id) REFERENCES profile(id),
    CONSTRAINT fk_video FOREIGN KEY (video_id) REFERENCES video(id)
);

CREATE TABLE author_video (
    id SERIAL PRIMARY KEY,
    author_id INT,
    video_id INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_author FOREIGN KEY (author_id) REFERENCES author(id),
    CONSTRAINT fk_video FOREIGN KEY (video_id) REFERENCES video(id)
);

CREATE TABLE keep_watching (
    id SERIAL PRIMARY KEY,
    video_id INT,
    profile_id INT,
    minute INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_video FOREIGN KEY (video_id) REFERENCES video(id),
    CONSTRAINT fk_profile FOREIGN KEY (profile_id) REFERENCES profile(id)
);

CREATE TABLE payment (
    id SERIAL PRIMARY KEY,
    user_id INT,
    pay_method_id INT,
    plan_type_id INT,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES user(id),
    CONSTRAINT fk_pay_method FOREIGN KEY (pay_method_id) REFERENCES pay_method(id),
    CONSTRAINT fk_plan_type FOREIGN KEY (plan_type_id) REFERENCES plan_type(id)
);

CREATE TABLE user_card (
    id SERIAL PRIMARY KEY,
    user_id INT,
    card_id INT,
    name VARCHAR(255),
    account_number CHAR(16),
    cvv CHAR(3),
    expiration_date DATE,
    created_at DATE DEFAULT CURRENT_DATE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES user(id),
    CONSTRAINT fk_card FOREIGN KEY (card_id) REFERENCES card(id)
);