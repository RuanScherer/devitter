import { Box, Input, InputGroup, InputLeftElement, Kbd, Text } from "@chakra-ui/react";
import { FiHash } from "react-icons/fi";
import { colors } from "../../../styles/theme";

export function SearchBar() {
  return (
    <Box
      as="form"
      alignItems="center"
      gap={3}
      backgroundColor="transparent"
      border="none"
      borderRadius={12}
    >
      <InputGroup>
        <InputLeftElement>
          <FiHash
            color={colors.gray[400]}
            size={20}
          />
        </InputLeftElement>
        <Input
          backgroundColor="dark.500"
          border="none"
          borderRadius={12}
          fontFamily="Roboto"
          color="gray.400"
          placeholder="Explorar"
          _placeholder={{
            fontWeight: "bold",
            color: "gray.400",
            opacity: 1
          }}
          _focus={{
            boxShadow: "none",
            border: "1px solid",
            borderColor: "primary.900"
          }}
        />
      </InputGroup>

      <Text
        fontSize={12}
        color="gray.400"
        marginLeft={3}
        marginTop={1}
      >
        <Kbd>Enter</Kbd> para pesquisar
      </Text>
    </Box>
  )
}
