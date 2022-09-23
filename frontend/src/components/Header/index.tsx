import { Box, Flex, Input, InputGroup, InputLeftElement } from "@chakra-ui/react";
import { FiHash } from "react-icons/fi";
import { colors } from "../../styles/theme";
import { UserBadge } from "./UserBadge";

export function Header() {
  return (
    <Flex
      alignItems="center"
      justifyContent="space-between"
      paddingY={6}
    >
      <Box width={12} height={12} bgColor="white.700"></Box>
      
      <Box
        as="form"
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
            backgroundColor="gray.450"
            border="none"
            borderRadius={12}
            fontFamily="Roboto"
            color="gray.400"
            placeholder="Explorar"
            _placeholder={{
              color: "gray.400",
              fontWeight: "bold"
            }}
            _focus={{
              boxShadow: "none",
              border: "1px solid",
              borderColor: "primary.900"
            }}
          />
        </InputGroup>
      </Box>

      <UserBadge />
    </Flex>
  )
}
