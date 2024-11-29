import { DataTypes } from "sequelize";
import { sequelize } from "../config/database.js";

const Product = sequelize.define(
    "products",
    {
        product_id: {
            type: DataTypes.UUID,
            defaultValue: DataTypes.UUIDV4,
            primaryKey: true,
            allowNull: false,
        },
        product_name: {
            type: DataTypes.STRING(80),
            allowNull: false,
        },
        product_description: {
            type: DataTypes.STRING(100),
            allowNull: false,
        },
    },
    {
        timestamps: false,
        tableName: "products",
    }
);

const Size = sequelize.define(
    "sizes",
    {
        size_id: {
            type: DataTypes.UUID,
            defaultValue: DataTypes.UUIDV4,
            primaryKey: true,
            allowNull: false,
        },
        size_name: {
            type: DataTypes.STRING(5),
            allowNull: false,
        },
    },
    {
        timestamps: false,
        tableName: "sizes",
    }
);

const ProductSize = sequelize.define(
    "productSize",
    {
        product_id: {
            type: DataTypes.UUID,
            defaultValue: DataTypes.UUIDV4,
            allowNull: false,
        },
        size_id: {
            type: DataTypes.UUID,
            defaultValue: DataTypes.UUIDV4,
            allowNull: false,
        },
        size_price: {
            type: DataTypes.DECIMAL(10, 2),
            allowNull: false,
        },
    },
    {
        timestamps: false,
        tableName: "products_sizes",
    }
);

// Relation
Product.belongsToMany(Size, {
    through: ProductSize,
    foreignKey: "product_id",
    otherKey: "size_id",
    as: "sizes",
});

Size.belongsToMany(Product, {
    through: ProductSize,
    foreignKey: "size_id",
    otherKey: "product_id",
    as: "product",
});

export { Product, Size, ProductSize, sequelize };
