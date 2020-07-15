import React, { Component } from 'react';
import {
    Image,
    TouchableOpacity
} from 'react-native';
const logoImage = require('../assets/logo.jpeg');
class Logo extends Component {
  goHome = () => {
      this.props.navigation.navigate('Home');
  }
  render() {
    return (
      <TouchableOpacity onPress={this.goHome}>
          <Image source={logoImage} style={{width:55, height:32}}/>
      </TouchableOpacity>
    );
  }
}
export default Logo;