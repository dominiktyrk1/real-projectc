import * as reactChartjs2 from "https://cdn.skypack.dev/react-chartjs-2@2.11.1";
const {Line} = reactChartjs2;
const {useState, useEffect, useRef, useCallback, useMemo} = React


const App = () => {
  const [coins, setCoins] = useState([]);
  const [search, setSearch] = useState('');
  

  useEffect(() => {
      axios
      .get(
        `https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=100&page=1&sparkline=true`
      )
      .then(res => {
        setCoins(res.data);
      })
      .catch(error => console.log(error));

  }, []);

  const handleChange = e => {
    setSearch(e.target.value);
  };

  const filteredCoins = coins.filter(coin =>
    coin.name.toLowerCase().includes(search.toLowerCase()) || coin.symbol.toLowerCase().includes(search.toLowerCase())
  );

  return (
    <div className='coin-app'>
      <div className='coin-search'>
        <h1 className='coin-text'>Top 100 Crypto</h1>
        <form>
          <input
            className='coin-input'
            type='text'
            onChange={handleChange}
            placeholder='Search'
          />
        </form>
      </div>
      <div className={'coins'}>
        <Header />
        {filteredCoins.map(coin => {
          return (
            <Coin
              key={coin.id}
              name={coin.name}
              price={coin.current_price}
              symbol={coin.symbol}
              marketcap={coin.total_volume}
              volume={coin.market_cap}
              image={coin.image}
              priceChange={coin.price_change_percentage_24h}
              chartData={coin.sparkline_in_7d.price}
            />
          );
        })}
      </div>
      
    </div>
  );
}

const Header = () => {
  return (
    <div className={'header'}>
      <h4>Name</h4>
      <h4>PriceUSD</h4>
       <h4 className={'market-cap'}>Market Cap</h4>
      
      <h4>24h</h4>
      <h4 className={'volume'}>Volume</h4>
     
    </div>
  )
}

const Coin = ({
  name,
  price,
  priceChange,
  symbol,
  marketcap,
  volume,
  image,
  chartData
  
}) => {
  
 const data = {
  labels: chartData,
  datasets: [
    {
      data: chartData.slice(chartData.length - 100, chartData.length),
      fill: true,
      backgroundColor: `${priceChange < 0 ? "rgba(255, 0, 0, 0.1)" : "rgba(0, 255, 0, 0.1)"}`,
      borderColor: `${priceChange < 0 ? "rgba(255, 0, 0, 0.8)" : "rgba(0, 255, 0, 1)"}`,
      pointRadius: 0
    }
  ]
};
  
  const options = {
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        ticks: { 
          display: false
        }
      }],
      yAxes: [{
        ticks: {
          display: true,
          fontSize: 8
        }
      }]
    },
    maintainAspectRatio: false,
    tooltips: {enabled: true},
    hover: {mode: null},
  };
  return (
    <div className='coin'>
      <div className={'coin-name'}>
          <img src={image} alt='crypto' />
          <h1>{name}</h1>
          <p className='coin-symbol'>{symbol}</p>
      </div>
    
          <p className='coin-price'>${price.toString().slice(0,6)}</p>
          <p className='coin-volume'>${volume.toLocaleString()}</p>
          {priceChange < 0 ? (
            <p className='coin-percent red'>{priceChange.toFixed(2)}%</p>
          ) : (
            <p className='coin-percent green'>+{priceChange.toFixed(2)}%</p>
          )}
          <p className='coin-marketcap'>
            ${marketcap.toLocaleString()}</p>
     
      <div className='coin-chart'>
        <Line height={100} data={data} options={options}/>
      </div>  
      
     
    
    </div>
  );
};


ReactDOM.render(<App />, document.getElementById('root'));
