import { Avatar, Flex, Heading, Menu, MenuButton, MenuItem, MenuList } from "@chakra-ui/react";
import { FiChevronDown } from "react-icons/fi";
import { colors } from "../../../styles/theme";

export function UserBadge() {
  return (
    <Menu
      placement="bottom-end"
      autoSelect={false}
      closeOnBlur
      closeOnSelect
    >
      <MenuButton
        backgroundColor="gray.450"
        borderRadius="full"
        paddingX={2}
        paddingY={1.5}
      >
        <Flex alignItems="center" gap={2}>
          <Avatar
            name="Ruan Scherer"
            size="sm"
            fontFamily="Roboto"
            fontWeight="bold"
          />
          <Heading
            color="white.700"
            fontSize={16}
            fontWeight="semibold"
          >
            Ruan Scherer
          </Heading>
          
          <FiChevronDown color={colors.white[700]} size={20} />
        </Flex>
      </MenuButton>

      <MenuList
        backgroundColor="gray.450"
        borderColor="gray.450"
        borderRadius={12}
        color="white.700"
        fontFamily="Roboto"
      >
        <MenuItem
          _hover={{
            backgroundColor: "gray.400"
          }}
        >
          Meu perfil
        </MenuItem>
        <MenuItem
          color="red.400"
          fontWeight="bold"
          _hover={{
            backgroundColor: "red.700",
            color: "white.700"
          }}
        >
          Sair
        </MenuItem>
      </MenuList>
    </Menu>
  )
}
