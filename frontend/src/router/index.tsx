import { createBrowserRouter } from "react-router-dom";
import { Home } from "../pages/Home";
import { RegisterAccount } from "../pages/RegisterAccount";

export const router = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
    // errorElement: <ErrorPage />
  },
  {
    path: "/register",
    element: <RegisterAccount />,
  }
])
