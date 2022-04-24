import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import 'antd/dist/antd.css';
import Header from './Header';
import { Navigation } from './layouts/Navigation';

export default class App extends Component {
    render() {
        return (
            <BrowserRouter>
            <div>
                <Navigation />
            </div>
        </BrowserRouter>
        );
    }
}

ReactDOM.render(<App />, document.getElementById('app'));