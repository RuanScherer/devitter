import { extendTheme } from "@chakra-ui/react"

export const colors = {
  dark: {
    500: "#1B2730",
    900: "#06141D"
  },
  gray: {
    150: "#C5D4E3",
    400: "#5D6C78",
    450: "#28343E",
  },
  white: {
    700: "#E1EAEE",
    800: "#F5FDFF"
  },
  primary: {
    900: "#23D897"
  }
}

const fonts = {
  heading: `'Roboto', sans-serif`,
  body: `'Roboto', Arial`,
}

export const theme = extendTheme({
  colors,
  fonts
})
