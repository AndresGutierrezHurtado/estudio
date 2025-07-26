import ReactDOM from "react-dom/client";
import { StrictMode } from "react";

// Entry Point
import App from "./App.jsx";

const container = document.getElementById("root");
const root = ReactDOM.createRoot(container);

root.render(
    <StrictMode>
        <App />
    </StrictMode>
);
