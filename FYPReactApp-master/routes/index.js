import React from 'react';
import { createStackNavigator } from 'react-navigation-stack';
import { createAppContainer } from 'react-navigation'; 
import Home from '../pages/home';
import Products from '../pages/Products';
import Checkout from '../pages/Checkout';
import Receipt from '../pages/Receipt';
import themes from '../styles/theme.style';
const NavStack = createStackNavigator(
{
  Home: {screen: Home},	
  Products: { screen: Products},
  Checkout: { screen: Checkout},
  Receipt: { screen: Receipt}
},
{
  initialRouteName: 'Home',
 navigationOptions: {
    headerStyle: {
        backgroundColor: themes.BACKGROUND_COLOR,
        paddingHorizontal: 10,
    },
    headerTintColor: '#fff'
 }
}
);
const Route = createAppContainer(NavStack);
export default Route;