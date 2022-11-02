import { Box, Center, Flex } from "@chakra-ui/react";
import { SearchBar } from "./SearchBar";
import { UserBadge } from "./UserBadge";

export function Header() {
  return (
    <Flex
      alignItems="start"
      justifyContent="space-between"
      paddingY={6}
    >
      <Center
        bgColor="primary.900"
        width={12}
        height={12}
        borderRadius={8}
      >
        Logo
      </Center>
      
      <Box display={["none", "none", "block"]}>
        <SearchBar />
      </Box>
      
      <UserBadge />
    </Flex>
  )
}
