import React, { Component } from 'react';
import { 
    View, 
    Text,
    Image,
    StyleSheet,
    TouchableOpacity 
} from 'react-native';
import themes from '../styles/theme.style';
class Product extends Component {
    addToCart = () => {
        this.props.addItemsToCart(this.props.item)
    }
    renderHeader = (headerItem) => {
        return (
        <Text style={styles.header}>{headerItem.section.title}</Text>
        );
    }
    render() {
        const { product } = this.props;
            return (
        <View style={styles.container}>
            <View style={styles.productDes}>
                <Text>{product.title}</Text>
                <Text>Rs. {(product.cost)}</Text>
                <TouchableOpacity onPress={this.addToCart} style={styles.addBtn}>
                    <Text style={styles.text}>Add to cart</Text>
                </TouchableOpacity>
            </View>
        </View>
    );
    }
}
const styles = StyleSheet.create({
    container:{
        flex: 1,
        alignItems: 'center',
        margin: 10,
    },
    header:{
        backgroundColor: '#ffd700',
        fontSize: 20,
        padding: 5,
        color: 'white',  
    },
    productDes: {
        justifyContent: 'center',
        alignItems: 'center',
        marginTop: 10,
    },
    addBtn: {
        borderRadius: 30,
        margin: 10,
        backgroundColor: themes.BUTTON_COLOR
    },
    text: {
        color: '#000000',
        fontSize: 16,
        padding: 10
    }
});
export default Product;