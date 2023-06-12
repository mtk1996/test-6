import React from "react";
import { createRoot } from "react-dom/client";

const App = () => (
    <>
        <h1>one</h1>
        <h1>two</h1>
        <h1>three</h1>
        <h1>fource</h1>
    </>
);

createRoot(document.querySelector("#root")).render(<App />);
