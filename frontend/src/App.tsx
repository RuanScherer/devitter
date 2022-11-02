import { ChakraProvider, SimpleGrid } from "@chakra-ui/react"
import "@fontsource/roboto"
import "@fontsource/roboto-slab"
import { RouterProvider } from "react-router-dom"
import { Header } from "./components/Header"
import { router } from "./router"
import "./styles/global.css"
import { theme } from "./styles/theme"

function App() {
  return (
    <ChakraProvider theme={theme}>
      <SimpleGrid
        maxWidth="1280"
        paddingX={8}
        marginX="auto"
      >
        <Header />
        <RouterProvider router={router} />
      </SimpleGrid>
    </ChakraProvider>
  )
}

export default App
