import {
  Box,
  Button,
  Flex,
  Grid,
  Input,
  InputGroup,
  InputRightElement,
  Link,
  Stack,
  Text
} from "@chakra-ui/react";
import { IoEyeOff, IoEye } from "react-icons/io5";
import { useState } from "react";

export function RegisterAccount() {

  const [showPassword, setShowPassword] = useState(false);

  const handleShowPassword = () => {
    setShowPassword(!showPassword);
  }

  return (
    <Flex
      height='100vh'
      alignItems='start'
      justifyContent='space-between'
      flexDirection='column'
    >
      <Box>
        <Text
          fontSize='1.4rem'
          as='b'
          color='whiteAlpha.800'
        >
          Devitter
        </Text>
      </Box>
      <Box>
        <Stack spacing={4} >
          <Text
            fontSize='2.4rem'
            as='b'
            color='whiteAlpha.800'
          >
            Crie uma nova conta.
          </Text>
          <Text fontSize='1rem' color='GrayText'>
            Já possui uma conta? <Link color='primary.900' href='#' style={{ textDecoration: "none" }}>Entre</Link>
          </Text>
          <Input
            type="text"
            placeholder='Nome completo'
            size='md'
            borderRadius='xl'
            borderColor='#1E2B33'
            bg='#1E2B33'
            textColor='whiteAlpha.800'
            fontSize='0.8rem'
            _placeholder={{
              color: 'whiteAlpha.600'
            }}
            _focus={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
            _hover={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
          />
          <Input
            type="text"
            placeholder='Nome de usuário'
            size='md'
            borderRadius='xl'
            borderColor='#1E2B33'
            bg='#1E2B33'
            textColor='whiteAlpha.800'
            fontSize='0.8rem'
            _placeholder={{
              color: 'whiteAlpha.600'
            }}
            _focus={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
            _hover={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
          />
          <Input
            type="email"
            placeholder='Email'
            size='md'
            borderRadius='xl'
            borderColor='#1E2B33'
            bg='#1E2B33'
            textColor='whiteAlpha.800'
            fontSize='0.8rem'
            _placeholder={{
              color: 'whiteAlpha.600'
            }}
            _focus={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
            _hover={{
              border: '1px solid primary.900',
              borderColor: 'primary.900',
              boxShadow: 'none'
            }}
          />

          <InputGroup size='md' >
            <Input
              size='md'
              type={showPassword ? 'text' : 'password'}
              placeholder='Senha'
              borderRadius='xl'
              borderColor='#1E2B33'
              bg='#1E2B33'
              textColor='whiteAlpha.800'
              fontSize='0.8rem'
              _placeholder={{
                color: 'whiteAlpha.600'
              }}
              _focus={{
                border: '1px solid primary.900',
                borderColor: 'primary.900',
                boxShadow: 'none'
              }}
              _hover={{
                border: '1px solid primary.900',
                borderColor: 'primary.900',
                boxShadow: 'none'
              }}
            />
            <InputRightElement width='4.5rem'>
              <Button
                bg="none"
                h='1.75rem'
                size='sm'
                onClick={handleShowPassword}
                _hover={{ background: 'none' }}
                _active={{
                  background: 'none'
                }}
              >
                {showPassword ? <IoEyeOff color='#d8d8d8' /> : <IoEye color='#d8d8d8' />}
              </Button>
            </InputRightElement>
          </InputGroup>
        </Stack>
        <Grid templateColumns='repeat(2, 1fr)' gap={4} marginTop='32px'>
          <Button
            bg='#555C69'
            color='whiteAlpha.800'
            borderRadius='3xl'
            size='lg'
            fontSize='1rem'
            _hover={{
              filter: 'brightness(0.9)'
            }}
          >
            Voltar
          </Button>
          <Button
            bg='primary.900'
            color='whiteAlpha.800'
            borderRadius='3xl'
            size='lg'
            fontSize='1rem'
            _hover={{
              filter: 'brightness(0.9)'
            }}
          >
            Criar conta
          </Button>
        </Grid>
      </Box>
      <Box />
    </Flex>
  )
}