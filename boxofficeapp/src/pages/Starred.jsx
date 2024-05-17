
import { useStarredShows } from "../lib/useStarredShows";
import { useQuery } from "@tanstack/react-query";
import { getShowsByIds } from "../api/tvmaze";
import ShowGrid from '../components/shows/ShowGrid';
import {TextCenter} from '../components/common/TextCenter';



const Starred = () => {
  const [starredShowsIds] =  useStarredShows();

  const { data: starredShows, error: starredShowsError } = useQuery({
    queryKey: ['starred', starredShowsIds],
    queryFn: async()=>{
        return getShowsByIds(starredShowsIds).then(result=>result.map(show=>({show})))
    }, 
    refetchOnWindowFocus:false,
  });
  if(starredShows?.length==0){
    return <TextCenter>No shows were starred</TextCenter>;
  }
  if(starredShows?.length>0){
    return <ShowGrid shows={starredShows}/>;
  }
  if (starredShowsError){
    return <TextCenter>Error ocurred{starredShowsError.message}</TextCenter>
  }
  return <div>Shows are loading</div>
};

export default Starred;
