import { FlexGrid } from '../common/Flexgrid';
import ActorCard from './ActorCard';
const Actorsgrid=({actors})=>{
    return (
    <FlexGrid>
        {actors.map(data=>
        (
            <ActorCard key ={data.person.id}
            name={data.person.name}
            country={data.person.country?data.person.name:null}
            birthday={data.person.birthday}
            deathday={data.person.birthday}
            gender={data.person.gender}
            image={data.person.image?data.person.image.medium:'/boxofficeimage.png'}
            />
           
        ))}
        
            </FlexGrid>)
}

export default Actorsgrid;