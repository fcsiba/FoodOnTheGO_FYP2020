import React, { Component } from 'react';
import Carousel from 'react-native-banner-carousel';
import { Text, 
    View,
    FlatList,
    StyleSheet,
    Dimensions,
    ScrollView,
    TextInput,
    TouchableOpacity,
    Image
} from 'react-native';
import Logo from '../components/Logo.component';
const images = [
  require('./dominos.png'),
  require('./PizzaHut.png'),
  require('./kfc.jpg')
];

var { height, width } = Dimensions.get("window");
//import Swiper from 'react-native-swiper'

export default class Home extends Component {
    constructor() {
        super();
        this.state = {
            dataSource:[]
        }
    }
    static navigationOptions = {
      //Setting the header of the screen
      title: 'Food On The Go',
     // headerLeft: <Logo navigation={navigation}/>,
    };
    renderPage(image, index) {
      return (
        <View key={index}>
          <Image resizeMode="contain" style={{width:width, height:height/4}} source={image} />
        </View>
      );
    }
    renderItem = ({ item }) => {
      const { navigate } = this.props.navigation;
      return (
        <View style={styles.containerCard}>
        <TouchableOpacity style={styles.card} onPress={() =>
            navigate('Products', {
              JSON_ListView_Clicked_Item: item.id,
            })
          }>
          <Image style={styles.cardImage} source={{uri: item.image}}/>
          <Text style={styles.cardText}>{item.name}</Text> 
        </TouchableOpacity>
        </View>
      
      )
    }
    componentDidMount() {
      const url = 'https://myfoodappfyp.000webhostapp.com/dbapi/routes/restaurantfiles.json'
      fetch(url)
      .then((response) => response.json())
      .then((responseJson) => {
        this.setState({
          dataSource: responseJson.data
        })
      })
      .catch((error) => {
        console.log(error)
      })
    }
  render() {
    return (
        <ScrollView>
      <View style={{ flex: 1, backgroundColor:"#f2f2f2" }}>
        <View style={styles.container}>
          <Carousel
          autoplay
          autoplayTimeout={4000}
          loop
          index={0}
          pageSize={width}
          >
        {images.map((image, index)=>this.renderPage(image, index))}
          </Carousel>
        </View>
        <View style={styles.container}>
         <FlatList
         data={this.state.dataSource}
         renderItem={this.renderItem}
         />
      </View>
      </View>
      </ScrollView>
      

    );
  }
}
const styles = StyleSheet.create({
  container: {
    flex:1,
    backgroundColor:"#fff",
    justifyContent: 'center'
  },
  containerCard: {
    marginTop: 20,
    backgroundColor:"#F5FCFF",
  },
  SeparatorLine: {
    backgroundColor: '#fff',
    width: 10,
    height: 40,
  },
  card: {
    backgroundColor: '#fff',
    marginBottom: 10,
    marginLeft: '2%',
    width: '96%',
    shadowColor: '#000000',
    elevation: 1,
    shadowRadius: 2,
    shadowOffset:{
      width:3,
      height:3
    }
  },
  cardImage: {
    width: '100%',
    height: 200,
    resizeMode: 'cover'
  },
  cardText: {
      padding: 10,
      fontSize: 24
  }
});