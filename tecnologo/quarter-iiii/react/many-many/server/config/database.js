import { Sequelize } from "sequelize";

export const sequelize = new Sequelize({
    dialect: "mysql",
    logging: false,
    host: process.env.DB_HOST,
    username: process.env.DB_USER,
    database: process.env.DB_NAME,
    password: process.env.DB_PASSWORD,
})

try {
    sequelize.authenticate();
    console.log("database connected");
} catch (error) {
    console.log("error")
}