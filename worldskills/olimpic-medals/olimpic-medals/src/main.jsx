import { StrictMode } from "react";
import { createRoot } from "react-dom/client";

// Entry Point
import App from "./App.jsx";

// Styles
import "./index.css";

createRoot(document.getElementById("root")).render(
    <StrictMode>
        <App />
    </StrictMode>
);
