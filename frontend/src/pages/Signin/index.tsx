import { Box, Button, Center, DarkMode, Heading, Icon, IconButton, Input, InputGroup, InputLeftElement, InputRightElement, Text } from "@chakra-ui/react";
import React from "react";
import { FaKiwiBird } from "react-icons/fa";
import { colors } from "../../styles/theme";
import { Link } from '@chakra-ui/react'
import { Flex } from '@chakra-ui/react'
import { FiEye, FiEyeOff, FiLock, FiMail } from "react-icons/fi";
import { Image } from '@chakra-ui/react'

export function Signin() {
  const [show, setShow] = React.useState(false)
  const handleClick = () => setShow(!show)

  return (
    <Flex
      direction="column"
      justifyContent="space-between"
      minHeight="100vh"
      gap={4}
    >
      <Box
        display="flex"
        flexDirection="row"
        alignItems="center"
        gap={3}
        paddingY={4}
      >
        <Icon as={FaKiwiBird} color={colors.primary[900]} w={8} h={8} />
        <Text color="white.800" fontSize='lg'>
          {"<Devitter/>"}
          <span className="dot"/>
        </Text>
      </Box>

      <Flex
        direction="column"
        justifyContent="space-between"
        maxWidth="400"
        gap={4}>
        <Heading
          color="white.700"
          as='h2'
          size='3xl'
        >
          Entrar no Devitter
          <span className="dot"/>
        </Heading>

        <Text
          color="white.700"
          fontSize='sm'
          marginBottom={2}
          marginTop={2}>
          Não tem cadastro?
          <Link color="primary.900"> Cadastre-se</Link>
        </Text>

        <InputGroup>
          <InputLeftElement>
            <FiMail
              color={colors.white[700]}
              size={20}
            />
          </InputLeftElement>

          <Input
            backgroundColor="dark.500"
            border="none"
            borderRadius={12}
            color="white.700"
            placeholder="Email"
            _placeholder={{
              fontWeight: "bold",
              color: "white.700",
              opacity: 1
            }}
            _focus={{
              boxShadow: "none",
              border: "2px solid",
              borderColor: "primary.900"
            }}
          />
        </InputGroup>

        <InputGroup>
          <InputLeftElement>
            <FiLock
              color={colors.white[700]} 
              size={20}
            />
          </InputLeftElement>

          <Input
            backgroundColor="dark.500"
            border="none"
            borderRadius={12}
            type={show ? 'text' : 'password'}
            color="white.700"
            placeholder='Senha'
            _placeholder={{
              fontWeight: "bold",
              color: "white.700",
              opacity: 1
            }}
            _focus={{
              boxShadow: "none",
              border: "2px solid",
              borderColor: "primary.900"
            }}
          />

          <InputRightElement>
            <IconButton
              h='1.75rem'
              size='sm'
              onClick={handleClick}
              aria-label={"Exibir Senha"}
              icon={show
                ? <FiEyeOff color={colors.white[700]} size={20} />
                : <FiEye color={colors.white[700]} size={20} />
              }
              backgroundColor={colors.dark[500]}
              _hover={{
                backgroundColor: "gray.450"
              }}
            >
              {show ? 'Hide' : 'Show'}
            </IconButton>
          </InputRightElement>
        </InputGroup>

        <Link 
          color="primary.900" 
          fontSize="sm"
          alignSelf="start"
        >
          Esqueceu a senha?
        </Link>

        <Button
          backgroundColor="primary.900"
          variant='solid'
          borderRadius={12}
          width="full"
          marginTop={4}
        >
          Entrar
        </Button>
      </Flex>
      <Box />
    </Flex>
  )
}
