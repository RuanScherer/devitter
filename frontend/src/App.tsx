import { ChakraProvider, extendTheme } from "@chakra-ui/react"
import { createBrowserRouter, RouterProvider } from "react-router-dom"
import { Home } from "./pages/Home"

const colors = {
  // define some colors
}

const theme = extendTheme({
  colors
})

const router = createBrowserRouter([
  {
    path: "/",
    element: <Home />,
    // errorElement: <ErrorPage />
  }
])

function App() {
  return (
    <ChakraProvider theme={theme}>
      <RouterProvider router={router} />
    </ChakraProvider>
  )
}

export default App
