import { Router } from "express";
import * as models from "../models/product.js";

const productRoutes = Router();

productRoutes.get("/products", async (req, res) => {
    try {
        const products = await models.Product.findAll({
            include: [{ model: models.Size, as: "sizes" }],
        });

        res.status(200).json({
            success: true,
            message: "Productos obtenidos correctamente",
            data: products,
        });
    } catch (error) {
        res.status(500).json({
            success: true,
            message: error.message || "",
            data: null,
        });
    }
});

productRoutes.post("/products", async (req, res) => {
    const t = await models.sequelize.transaction();
    try {
        const product = await models.Product.create(req.body.product, {
            transaction: t,
        });

        await models.ProductSize.bulkCreate(
            req.body.productSizes.map((size) => ({ ...size, product_id: product.product_id })),
            { transaction: t }
        );

        t.commit();
        res.status(200).json({
            success: true,
            message: "Productos obtenidos correctamente",
            data: product,
        });
    } catch (error) {
        t.rollback();
        res.status(500).json({
            success: false,
            message: error.message || "",
            data: null,
        });
    }
});

export default productRoutes;
