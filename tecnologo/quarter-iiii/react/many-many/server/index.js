import express from "express";
import cors from "cors";
import productRoutes from "./routes/product.routes.js";

const app = express();

app.use(express.json());
app.use(
    cors({
        origin: process.env.VITE_APP_URL,
        credentials: true,
    })
);

app.use("/api/v1", productRoutes);

app.listen(process.env.VITE_API_PORT, () => `listening on port ${process.env.VITE_API_PORT}`);
