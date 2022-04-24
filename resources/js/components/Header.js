import React from 'react';
import {Link} from 'react-router-dom'
import {PageHeader, Button} from 'antd';

class Header extends React.Component {
    render() {
        return (
            <div>
                <PageHeader
                    style={{
                        border: '1px solid rgb(235, 237, 240)',
                    }}
                    title="Bài viết"
                    extra={[
                        <Link to='create'>
                            <Button key="1" type="primary">
                                Thêm bài viết
                            </Button>
                        </Link>
                    ]}
                />
            </div>
        );
    }
}

export default Header;