import { useState } from 'react';
import { useQuery } from '@tanstack/react-query';
import { searchForShows, searchForPeople } from '../api/tvmaze';
import SearchForm from '../components/SearchForm';
import ShowGrid from '../components/shows/ShowGrid';
import ActorsGrid from '../components/actors/ActorsGrid';
import styled, {  ThemeProvider } from 'styled-components';
import { TextCenter } from '../components/common/TextCenter';

const theme = {
  colors: { main: 'blue' },
};

const Container = styled.div`
  text-align: center;
`;

// const Button = styled.button`
//   background: transparent;
//   border-radius: 3px;
//   border: 2px solid #BF4F74;
//   color: ${(props) => props.theme.colors.main};
//   margin: 0 1em;
//   padding: 0.25em 1em;
//   ${props =>
//     props.$primary &&
//     css`
//       background: '#BF4F74';
//       color: white;
//     `};
//   ${props =>
//     props.$fontSize &&
//     css`
//       font-size: ${props.$fontSize}px;
//     `};
// `;

const Home = () => {
  const [filter, setFilter] = useState(null);

  const { data: apiData, error: apiDataError } = useQuery({
    queryKey: ['search', filter],
    queryFn: () => (filter.searchOption === 'shows' ? searchForShows(filter.q) : searchForPeople(filter.q)),
    enabled: !!filter,
    refetchOnWindowFocus: false,
  });

  const onSearch = async ({ q, searchOption }) => {
    setFilter({ q, searchOption });
  };

  const renderApiData = () => {
    if (apiDataError) {
      return <TextCenter>Error occurred: {apiDataError.message}</TextCenter>;
    }
    if (apiData?.length === 0) {
      return <TextCenter>No results</TextCenter>;
    }
    if (apiData) {
      return apiData[0].show ? <ShowGrid shows={apiData} /> : <ActorsGrid actors={apiData} />;
    }
    return null;
  };

  return (
    <ThemeProvider theme={theme}>
      <Container>
        
      </Container>
      <SearchForm onSearch={onSearch} />
      <div>{renderApiData()}</div>
    </ThemeProvider>
  );
};

export default Home;
